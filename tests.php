<?php
    // insert test stuff here
    class tests{
        public $numberOfPassed = 0;
        public $numberOfFailed = 0;

        function TestThisItem($expectedOutcome, $inputFunction, $testName){
            if($expectedOutcome === $inputFunction){
                $this->numberOfPassed++;
                return "<div style='color:green;'><br><br>" . $testName .": Passed</div>";
            }else{
                $this->numberOfFailed++;
                return "<div style='color:red;'><br><br>" . $testName .": failed 
                        <br>Expected Outcome was '$expectedOutcome'
                        <br>Actual Outcome was '$inputFunction'</div>";
            }
        }

        function echoTestResults(){
            $total = $this->numberOfPassed + $this->numberOfFailed;
            if ($total === $this->numberOfPassed){
                $color = "style='color:green; font-size:2em;'";
            }else{
                $color = "style='color:red; font-size:2em;'";
            }
            return "<div $color ><br>
            Test Totals: $this->numberOfPassed passed out of $total</div>";
        }
    }

?>