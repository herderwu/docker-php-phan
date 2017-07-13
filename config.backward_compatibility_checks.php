<?php

use \Phan\Issue;

/**
 * This configuration will be read and overlayed on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 *
 * @see src/Phan/Config.php
 * See Config for all configurable options.
 *
 * A Note About Paths
 * ==================
 *
 * Files referenced from this file should be defined as
 *
 * ```
 *   Config::projectPath('relative_path/to/file')
 * ```
 *
 * where the relative path is relative to the root of the
 * project which is defined as either the working directory
 * of the phan executable or a path passed in via the CLI
 * '-d' flag.
 */

return [
    // Backwards Compatibility Checking. This is slow
    // and expensive, but you should consider running
    // it before upgrading your version of PHP to a
    // new version that has backward compatibility
    // breaks.
    'backward_compatibility_checks' => true,

    // By default, Phan will analyze all node types.
    // If this config is set to false, Phan will do a
    // shallower pass of the AST tree which will save
    // time but may find less issues.
    'should_visit_all_nodes' => true,

    // If empty, no filter against issues types will be applied.
    // If this white-list is non-empty, only issues within the list
    // will be emitted by Phan.
    'whitelist_issue_types' => [
        'PhanCompatiblePHP7',  // This only checks for **syntax** where the parsing may have changed. This check is enabled by `backward_compatibility_checks`
        'PhanDeprecatedFunctionInternal',  // Warns about a small number of functions deprecated in 7.0 and later. Requires phan 0.9.2
        'PhanUndeclaredFunction',  // Check for removed functions such as split() that were deprecated in php 5.x and removed in php 7.0.
    ],
];
