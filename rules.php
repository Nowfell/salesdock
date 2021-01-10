<?php
    class A{ 
        private $rule_arr = array();
        public function ruleUploadSpeedLessThan100()
        {
            $this->rule_arr['query'] = "SELECT * from products WHERE upload_speed < 100";
            $this->rule_arr['name'] = "Upload Speed Less Than 100";

            return $this->rule_arr;
        }
        public function ruleUploadSpeedLessThan100AndFiber()
        {
            $this->rule_arr['query'] = "SELECT * from products WHERE upload_speed < 100 AND technology = 'fiber'";
            $this->rule_arr['name'] = "Upload Speed Less Than 100 And Fiber";

            return $this->rule_arr;
        }
    }
    class B{
        private $rule_arr = array();
        public function ruleDownloadSpeedGreaterThan100AndFiber()
        {
            $this->rule_arr['query'] = "SELECT * from products WHERE download_speed > 100 AND technology = 'fiber'";
            $this->rule_arr['name'] = "Download Speed Greater Than 100";

            return $this->rule_arr;
        }
    }
?>