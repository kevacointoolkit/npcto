<?php
$type = "NPC.TO";
?>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?= $type ?></title>
    <link rel="stylesheet" href="css/common.css?v1.1">
    <link rel="stylesheet" href="css/wenda.css?v1.1">
    <link rel="stylesheet" href="css/hightlight.css">
	<style>
      #file-input {
        display: none;
      }

      #file-input-btn {

        padding: 10px 10px;
        background-color: #fff;
        color: grey;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
		max-width:105px;
		width:80px;
      }


	   #key {
	   margin:2px;
        padding: 10px 10px;
        background-color: #fff;
        color: grey;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
		display:block;

		width:auto;
      }

#preview-container {
  position: fixed;
  top: 20%;
  left: 50%;
  transform: translate(-50%,-20%);
  z-index: 9999;
}


.dropbtn {
  padding: 10px 10px;
        background-color: #fff;
        color: grey;
        font-size: 16px;
		font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
		max-width:105px;
		width:100px;
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
  min-width: 160px;
  padding: 12px 16px;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  border-radius: 4px;

}

.dropdown-content a {
  color: black;
  padding: 6px 8px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #e1e1e1;
}

  .header-logo {
    width: 100%; 
  }
    </style>

</head>

<body>	    


    

    <div class="layout-wrap">
        <header class="layout-header">
		
            
               

			<div class="dropdown" style="position:relative; display:inline-block;">
    <button class="dropbtn">NPC.TO</button>
    <div class="dropdown-content">
	<div style="display: flex;flex-direction: row;">
		<a class="links" id="clean" title="clean text">CLEAN</a>

<a href="/" class="links" id="clickable-link">GPT4</a>

<a href="/35" class="links" id="clickable-link2">GPT3.5</a>
		
        <a href="#" data-value="I want you to act like {Character} from {Series}. I want you to respond and answer like {Character}, without any explanations. You must know everything about {Character}. My first sentence is 'Hello.'">Character</a>

        <a href="#" data-value="I want you to be my Linux terminal. I'll input commands, and you'll reply with what the terminal should display. I want you to reply only within a single code block, and not with any other content. Don't provide explanations. Only type commands when I instruct you to do so. When I need to tell you something in English, I will put the text in brackets like this [like this]. My first command is 'pwd'">Linux</a>

        <a href="#" data-value="I want you to be my English translator, spell checker, and rhetoric improver. I'll communicate with you in any language, and you'll identify the language, translate it, and respond to me in more elegant and refined English. Please replace my simple vocabulary and sentences with more beautiful and literary expressions while ensuring that the meaning remains unchanged. Please only respond with corrections and improvements, and do not provide explanations. My first sentence is 'How are you?' Please translate it.">Translator</a>


		<a href="#" data-value="I want you to play the role of a storyteller. You will come up with an engaging, imaginative, and captivating story that would appeal to the audience. It can be a fairy tale, an educational story, or any other type of story that has the potential to capture people's attention and imagination. Depending on the target audience, you can select a specific theme or subject for the storytelling segment. For instance, if it is for children, you can talk about animals, and if it is for adults, a story based on history might better capture their attention. My first request is, 'I need an interesting story about perseverance.'">Storyteller</a>

		<a href="#" data-value=""></a>

		</div>

    </div>
</div>		 



                            <input type="checkbox" id="keep" checked="checked" style="display:none;" checked>
				
              
         
  <button id="file-input-btn">PFP</button>
  <input type="password" id="key" onload="this.focus();" placeholder="API-KEY">
        </header>

        <div class="layout-content">

            <div class="container">
                <article class="article" id="article">
                    <div class="article-box">
                                  
   <br>
						<center>
						
 <div id="preview-container"></div>
						</center>
					
   <br>
	
                        <ul id="article-wrapper">
            	
                        </ul>

                        <div class="creating-loading" data-flex="main:center dir:top cross:center">
                            <div class="semi-circle-spin"></div>
                        </div>
                        <div id="fixed-block">
                            <div class="precast-block" id="kw-target-box" data-flex="main:left cross:center">
                                <div id="target-box" class="box">
                                    <textarea name="kw-target" placeholder="INPUT WORDS, Ctrl+Enter Send" id="kw-target" autofocus rows=1></textarea>
                                </div>
                                <div class="right-btn layout-bar">
                                    <p class="btn ai-btn bright-btn" id="ai-btn" data-flex="main:center cross:center"><i class="iconfont icon-wuguan"></i>SEND</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.cookie.min.js"></script>
    <script src="js/layer.min.js"></script>
    <script src="js/chat.js?v2.8"></script>
    <script src="js/highlight.min.js"></script>
    <script src="js/showdown.min.js"></script>


<script>
    const fileInputBtn = document.querySelector("#file-input-btn");
const previewContainer = document.querySelector("#preview-container");

fileInputBtn.addEventListener("click", function () {
  const input = document.createElement("input");
  input.type = "file";
  input.accept = "image/*,video/*";
  input.onchange = function (event) {
    const file = event.target.files[0];
    if (file.type.startsWith("image")) {
      // If the selected file is an image
      const reader = new FileReader();
      reader.onload = function (event) {
        const img = document.createElement("img");
        img.src = event.target.result;
		img.style.maxHeight = "70vh";
        previewContainer.innerHTML = "";
        previewContainer.appendChild(img);
      };
      reader.readAsDataURL(file);
    } else if (file.type.startsWith("video")) {
      // If the selected file is a video
      const video = document.createElement("video");
      video.src = URL.createObjectURL(file);
      video.controls = true;
      video.autoplay = true;
      video.loop = true;
	  video.style.maxHeight = "70vh";
      previewContainer.innerHTML = "";
      previewContainer.appendChild(video);
    }
  };
  input.click();
});



var dropdown = document.querySelector('.dropdown');
var dropdownContent = document.querySelector('.dropdown-content');
var textarea = document.querySelector('#kw-target');


dropdown.addEventListener('click', function() {
    dropdownContent.classList.toggle('show');
});


dropdownContent.addEventListener('click', function(event) {
    event.preventDefault();

    if (event.target.tagName.toLowerCase() === 'a') {
        var value = event.target.getAttribute('data-value');
        textarea.value = ''; // 
        textarea.value += value;
        dropdownContent.classList.remove('show');
    }
});

document.getElementById("clickable-link").addEventListener("click", function(event) {
  event.stopPropagation();
  window.location.href = this.href;
});
document.getElementById("clickable-link2").addEventListener("click", function(event) {
  event.stopPropagation();
  window.location.href = this.href;
});
</script>




</body>

</html>