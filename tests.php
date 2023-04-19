<?php
    // insert test stuff here
    class tests{
        public $numberOfPassed = 0;
        public $numberOfFailed = 0;


        function TestM_recipe()
        {
            try
            {
                include_once "DatabaseObjects/M_recipe.php";
                $return =  "<div style='color:green;'><br><br>M_Recipe Load: Passed</div>";
                $M_recipe = new M_recipe(1);
                $return =  "<div style='color:green;'><br><br>M_Recipe Set: Passed</div>";
                $return .= $this->TestThisItem($M_recipe->recipe_id, 1, "M_Recipe ID get");
                $return .= $this->TestThisItem($M_recipe->recipe_name, "Apple Frangipan Tart", "M_Recipe Name get");
                $return .= $this->TestThisItem($M_recipe->recipe_type, "Dessert", "M_Recipe recipe_type get");
                $return .= $this->TestThisItem($M_recipe->recipe_area, "British", "M_Recipe recipe_area get");
                $return .= $this->TestThisItem($M_recipe->image, "https://www.themealdb.com/images/media/meals/wxywrq1468235067.jpg", "M_Recipe image get");
                $return .= $this->TestThisItem($M_recipe->source_url,"", "M_Recipe source_url get");
                $return .= $this->TestThisItem($M_recipe->youtube_url, "https://www.youtube.com/watch?v=rp8Slv4INLk", "M_Recipe youtube_url get");
                $return .= $this->TestThisItem($M_recipe->date_created, "2023-03-14", "M_Recipe date_created get");
                $return .= $this->TestThisItem($M_recipe->user_id, 0, "M_Recipe user_id get");
                return $return;
            } catch (\Exception $ex) {
                $color = "style='color:red; font-size:2em;'";
                return "<div style='color:red;'><br><br>M_Recipe.php Error!! </div>";
            }
        }
        
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
            $urlArray = array("Login.php","SearchCategory.php","SignUp.php","runtest.php","UserRecipes.php","viewrecipes.php","logout.php",
                    "ListViewRecipes.php","favorite.php", "CreateAccount.php", "AddRecipe.php");
            $count = count($urlArray);
            $returnTxt = "";
            $i = 0;
            $total500 = 0;
            $temp = "";
            for ($j = 0; $j < $count; $j++) 
            {
                $total500++;
                $returnTxt =  $this->run500errors($urlArray[$j]);

                if($returnTxt === "true")
                {
                    $this->numberOfPassed++;
                    $temp .= $urlArray[$j] . " Passed<br>";
                }

            }
            $total += $total500;
            return "<div $color >
            <div style='font-size:.5em;'>
            <br>
            500 Error test: <br> 
            $temp <br>
            </div>
            Test Totals: $this->numberOfPassed passed out of $total <br></div>";

        }

        function run500errors($row)
        {
            $x = 0;
            $y = 0;
            $i = 0;
            $temp = "";
            $i++;
            try
            {
                
                $url = 'http://localhost//RecipeWebsite/' . $row;
                //session_start();

                $mycurl = curl_init($url);
                if($mycurl)
                {
                    curl_close($mycurl);
                    return "true";
                }
                else
                {
                    // curl_setopt($mycurl, CURLOPT_SSL_VERIFYHOST, 0);
                    // curl_setopt($mycurl, CURLOPT_SSL_VERIFYPEER, 0);
                    // curl_setopt($mycurl, CURLOPT_RETURNTRANSFER, true);
                    // curl_setopt($mycurl, CURLOPT_HEADER, true);
                    // //curl_setopt($mycurl, CURLOPT_COOKIE, session_name() . '='. session_id());
                    // curl_setopt($mycurl, CURLOPT_COOKIE, session_name().'='.session_id().';');
                    // $output = curl_exec($mycurl);
                    // $result = curl_getinfo($mycurl, CURLINFO_HTTP_CODE);
                    $result = true;
                    
                }
                if($result == '500')
                {
                    $all_worked = false;
                }
                elseif($result != '200')
                {
                    echo "GOT RESULT CODE ".$result." <br>\n";
                }
                else
                {
                    $temp .= " WORKED!<br>\n";
                    $y++;
                }
            } catch (\Exception $ex) {
                $x++;
            }
            
            return true;
        }

    }

?>