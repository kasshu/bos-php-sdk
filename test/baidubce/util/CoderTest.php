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

require_once __BOS_CLIENT_ROOT . "/baidubce/util/Coder.php";

class CoderTest extends PHPUnit_Framework_TestCase {
    public function testMd5FromStream() {
        $fp = fopen(__FILE__, 'r');

        $this->assertEquals(
            md5(file_get_contents(__FILE__)),
            baidubce_util_Coder::Md5FromStream($fp, 0)
        );

        $this->assertEquals(
            md5(substr(file_get_contents(__FILE__), 10, 10)),
            baidubce_util_Coder::Md5FromStream($fp, 10, 10)
        );

        $this->assertEquals(
            md5(substr(file_get_contents(__FILE__), 10)),
            baidubce_util_Coder::Md5FromStream($fp, 10)
        );

        fclose($fp);
    }

    public function testGuessMimeType() {
        $this->assertEquals('application/javascript', baidubce_util_Coder::GuessMimeType('a.js'));
        $this->assertEquals('application/javascript', baidubce_util_Coder::GuessMimeType('a.js'));
        $this->assertEquals('application/octet-stream', baidubce_util_Coder::GuessMimeType('a.js1'));
        $this->assertEquals('application/octet-stream', baidubce_util_Coder::GuessMimeType(''));
        $this->assertEquals('application/vnd.ms-excel.addin.macroenabled.12', baidubce_util_Coder::GuessMimeType('a.xlam'));
    }
}




/* vim: set ts=4 sw=4 sts=4 tw=120: */
