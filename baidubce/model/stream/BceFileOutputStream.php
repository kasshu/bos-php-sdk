<?php
/*
 * Copyright (c) 2014 Baidu.com, Inc. All Rights Reserved
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on
 * an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 */

namespace baidubce\model\stream;
require_once __DIR__ . "/BceOutputStream.php";

class BceFileOutputStream extends BceOutputStream {
    function __construct($file_name) {
        $this->file_handle = fopen($file_name, "w+");
        $this->file_name = $file_name;
    }

    function __destruct() {
        fclose($this->file_handle);
    }

    public function write($data) {
        return fwrite($this->file_handle, $data);
    }

    public function reserve($size) {
        return;
    }

    public function readAll() {
        fflush($this->file_handle);
        return file_get_contents($this->file_name);
    }

    private $file_handle;
    private $file_name;
} 