<?php

namespace L3l0Labs\Filesystem\Exception;

use InvalidArgumentException;
use L3l0Labs\Filesystem\Filename;

class FilesOutOfDirectory extends \InvalidArgumentException
{
    public function __construct(Filename $directoryName, $filesNames)
    {
        $filePaths = array_map(function ($fileName) {
            return '"'.$fileName->path().'"';
        }, $filesNames);
        $message = sprintf('Directory "%s" has not such files %s', $directoryName->path(), implode(', ', $filePaths));

        parent::__construct($message);
    }
}
