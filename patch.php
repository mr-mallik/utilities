<?php
/**
 * Patch Creator Script
 * 
 * This PHP script creates a patch by copying files from a source directory to a target directory.
 * It provides a web interface where users can specify project details and files to be included
 * in the patch.
 * 
 * Features:
 * - Creates timestamped patch directories
 * - Maintains original directory structure
 * - Handles multiple file inputs (newline or comma-separated)
 * - Provides feedback on copy operations
 * 
 * Required Form Fields:
 * - Project Name: Name of the project (used for patch directory)
 * - Source Path: Base path of the source files
 * - Files List: List of files to be copied (absolute paths)
 * 
 * Directory Structure:
 * /Patch
 *   /YYYYMMDDHHMMSS
 *     /project_name
 *       /relative_path_structure
 * 
 * Constants:
 * - BASE_PATH: Script's directory path
 * - PATCH_BASE: Base directory for patches with timestamp
 * 
 * Functions:
 * - createDirectoryTree($dir): Creates nested directory structure
 * - processFilePaths($input): Processes user input into array of file paths
 * 
 * @author Gulger Mallik
 * @version 1.0
 * @date 2025-04-18
 * @license MIT
 */

# Base Path
define('BASE_PATH', dirname(__FILE__) . '/');
define('PATCH_BASE', 'Patch' . '/' . date('YmdHis'));

function createDirectoryTree($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

function processFilePaths($input) {
    // Split by newline or comma
    $paths = preg_split('/[\n,]+/', trim($input));
    return array_filter(array_map('trim', $paths));
}

$message = '';

if (isset($_POST['submit'])) {
    $project_name = trim($_POST['project_name']);
    $source_path = rtrim(trim($_POST['source_path']), '/\\');
    $files_input = $_POST['files_list'];
    
    if (!empty($project_name) && !empty($files_input) && !empty($source_path)) {
        $PATCH_DIR = BASE_PATH . PATCH_BASE . '/' . $project_name;
        createDirectoryTree($PATCH_DIR);
        
        $files_to_copy = processFilePaths($files_input);
        
        foreach ($files_to_copy as $file) {
            if (file_exists($file)) {
                // Get relative path by removing source path
                $relative_dir = str_replace(str_replace('\\', '/', $source_path) . '/', '', str_replace('\\', '/', dirname($file)));
                $target_dir = $PATCH_DIR . '/' . $relative_dir;
                $target_file = $target_dir . '/' . basename($file);
                
                createDirectoryTree($target_dir);
                
                if (copy($file, $target_file)) {
                    $message .= "Copied: $file -> $target_file<br>";
                } else {
                    $message .= "Failed to copy: $file<br>";
                }
            } else {
                $message .= "File not found: $file<br>";
            }
        }
    } else {
        $message = "Please provide project name, source path and file list";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patch Creator</title>
</head>
<body>
    <form method="post">
        <p>
            <label>Project Name:</label><br>
            <input type="text" name="project_name" required>
        </p>
        <p>
            <label>Source Path (e.g., D:/veevees):</label><br>
            <input type="text" name="source_path" required>
        </p>
        <p>
            <label>Files List (one per line or comma-separated):</label><br>
            <textarea name="files_list" rows="10" cols="60" required></textarea>
        </p>
        <input type="submit" name="submit" value="Create Patch">
    </form>
    
    <?php if (!empty($message)): ?>
        <div style="margin-top: 20px">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</body>
</html>