<?php
    class bludYT extends Plugin {

        public function init(){
            $this->dbFields = array(
        'widthyt'=> '',
        'heightyt'=> '', 
            );
        }


        public function pageBegin() {
            echo'
	
            <style>
            
            .ytplayer{
                width:'.$this->getValue('widthyt').';
                height:'.$this->getValue('heightyt').';
            }
            
            </style>
            
            
            ';
        }

        public function pageEnd() {
          
            echo <<< END

            <script>
             function doitman(){
                 for (let i=0; i<100; i++){
            document.body.innerHTML =  document.body.innerHTML.replace('{% ','<div class="ytdiv">').replace(' %}','</div>');; 
             }
             
             document.querySelectorAll('.ytdiv').forEach(
                (i)=>{
                    let ytDivContent = i.innerHTML;
                i.innerHTML = '<iframe class="ytplayer" src="https://www.youtube.com/embed/'+ytDivContent+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                
                }
             );
             
             };
             
             doitman();
            
             </script>
            
            END;

        }


        public function form(){


            $html = '<h3>BludYT Settings</h3>
<br>
            <div class="border col-md-12 p-3 bg-danger text-light">
            <h4>How to use this plugin?</h4>

        
            <b>Full url your movie:</b><br>
            https://www.youtube.com/watch?v=<span style="font-weight:bold;background:rgba(0,0,0,0.5);padding:3px;border-radius:3px;">rr0gvSS1OzE</span>

            <br>
            <br>
            <b>Id for place on your content page  with special {% shortcode %}</b><br>
            <br>
            {% <span style="font-weight:bold;background:rgba(0,0,0,0.5);padding:3px;border-radius:3px;">rr0gvSS1OzE</span> %}
            </div>

            <br>
            
            <div class="border bg-light p-2">

            Width all player px or %:
             <input type="text" name="widthyt" class="widthytplayer" value="'.$this->getValue('widthyt').'" style="width:100%;padding:5px;margin:10px 0;"><br>
             Height all player px or %: <br>
             <input type="text" name="heightyt" value="'.$this->getValue('heightyt').'" class="heightytplayer"  style="width:100%;padding:5px;margin:10px 0;"><br>

             </div>
            
            
             ';

             return $html;

        }

    }
?>