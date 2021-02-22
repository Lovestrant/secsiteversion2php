
// secsitee share apis 

let currenturl = window.location.href;
let currentpagetitle = document.title;

//get id
let facebook = document.getElementById("fb");
let whatsapp = document.getElementById("ws");
let twitter = document.getElementById("tw");
let linkedin = document.getElementById("lk");
let googleplus = document.getElementById("gp");

//facebook


    
    facebook.addEventListener("click", ()=>{
        let fb_shareurl= "http://www.facebook.com/share.php?u="+currenturl;
        let window_size = "width: 565, height: 569";
        window.open(fb_shareurl, "", "menubar=no, resizeable=yes, scrollbars= yes,"+window_size);
        return false;
      });
    

  //twitter
  twitter.addEventListener("click", ()=>{
  let fb_shareurl= "https://twitter.com/share?url='+params.url+'&amp;text="+currentpagetitle+"&url="+currenturl;
  let window_size = "width: 565, height: 569";
  window.open(fb_shareurl, "", "menubar=no, resizeable=yes, scrollbars= yes,"+window_size);
  return false;
});
  //whatsapp
  whatsapp.addEventListener("click", ()=>{
  let fb_shareurl= "whatsapp://send?text="+currenturl;
  let window_size = "width: 565, height: 569";
  window.open(fb_shareurl, "", "menubar=no, resizeable=yes, scrollbars= yes,"+window_size);
  return false;
});
  //google plus
  facebook.addEventListener("click", ()=>{
  let fb_shareurl= "http://www.facebook.com/share.php?u="+currenturl;
  let window_size = "width: 565, height: 569";
  window.open(fb_shareurl, "", "menubar=no, resizeable=yes, scrollbars= yes,"+window_size);
  return false;
});
  //linkedin

  linkedin.addEventListener("click", ()=>{
  let fb_shareurl= "http://www.linkedin.com/shareArticle?mini=true&amp;url="+currenturl;
  let window_size = "width: 565, height: 569";
  window.open(fb_shareurl, "", "menubar=no, resizeable=yes, scrollbars= yes,"+window_size);
  return false;
});
  //googleplus

  googleplus.addEventListener("click", ()=>{
  let fb_shareurl= "https://plus.google.com/share?url="+currenturl;
  let window_size = "width: 565, height: 569";
  window.open(fb_shareurl, "", "menubar=no, resizeable=yes, scrollbars= yes,"+window_size);
  return false;

});
