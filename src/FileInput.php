<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023;

use Generator;

trait FileInput
{
    protected $file_handle;

    protected function readFileLines(): Generator
    {
        while (!feof($this->file_handle)) {
            try {
                yield trim((string)fgets($this->file_handle));
            } catch (Throwable $e) {
                yield '';
            }
        }
    }

    protected function set_file_handler(): void
    {
        $this->file_handle = fopen($this->input_path, 'r');
    }

    protected function unset_file_handler(): void
    {
        fclose($this->file_handle);
    }
}
