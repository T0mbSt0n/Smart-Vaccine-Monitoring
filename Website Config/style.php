<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


?>




* {
    text-decoration: none;
    margin: 0px;
    padding: 0px;
}

body {
    margin: 0px;
    padding: 0px;
    font-family: 'Open Sans',sans-serif;
}

.wrapper {
    width: 1100px;
    margin: auto;
    position: relative;
}

.logo a {
    font-size: 50px;
    font-weight: 800;
    float: left;
    font-family: courier;
    color: #364f6b;
}

.menu {
    float: right;
}

nav {
    width: 100%;
    margin: auto;
    display: flex;
    line-height: 80px;
    position: sticky;
    position: -webkit-sticky; 
    top: 0;
    background: #FFFFFF;
    z-index: 2;
    border-bottom:1px solid #364f6b;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

nav ul li {
    float: left;
}

nav ul li a {
    color: black;
    font-weight: bold;
    text-align: center;
    padding: 0px 16px 0px 16px;
    text-decoration: none;
}

nav ul li a:hover {
    text-decoration: underline;
}

section {
    margin: auto;
    display: flex;
    margin-bottom: 50px;
}


.kolom {
    margin-top: 50px;
    margin-bottom: 50px;
}

input[type="checkbox"] {
  position: relative;
  width: 100px;
  height: 40px;
  background: #bdc3c7;
  -webkit-appearance: none;
  border-radius: 20px;
  outline: none;
  transition: .4s;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

input:checked[type="checkbox"] {
  background: #3498db;
}

input[type="checkbox"]::before {
  z-index: 1;
  position: absolute;
  content: "";
  left: 0;
  width: 40px;
  height: 40px;
  background: #fff;
  border-radius: 50%;
  transform: scale(1.1);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: .4s;
}

input:checked[type="checkbox"]::before {
  left: 55px;
}

.toggle {
  position: relative;
  display: inline;
}

label {
  position: absolute;
  color: #fff;
  font-weight: 500;
  font-size: 18px;
  pointer-events: none;
}

.onbtn {
  bottom: 13px;
  left: 5px;
}

.ofbtn {
  bottom: 13px;
  right: 5px;
  color: #fff;
}

.kolom .deskripsi {
    font-size: 25px;
    font-weight: bold;
    font-family: 'comic sans ms';
    color: #364f6b;
}

#map {
     height: 100%;
        }

h2 {
    font-family: 'comic sans ms';
    font-weight: 800;
    font-size: 45px;
    margin-bottom: 20px;
    color: #364f6b;
    width: 100%;
    line-height: 50px;
    text-align: center;

}

a.tbl-biru {
    background: #3f72af;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-biru:hover {
    background: #fc5185;
    text-decoration: none;
}

a.tbl-pink {
    background: #fc5185;
    border-radius: 20px;
    margin-top: 20px;
    padding: 15px 20px 15px 20px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
}

a.tbl-pink:hover {
    background: #3f72af;
    text-decoration: none;
}

p {
    margin: 10px 0px 10px 0px;
    padding: 10px 0px 10px 0px;
}

.kartu {
    display: flex;
    font-family:'comic sans ms' ;
    font-size: 20px;
}
.tengah {
    text-align: center;
    width: 100%;
}

.tutor-list {
    width: 100%;
    position: relative;
    display: flex;
    flex-wrap: wrap;
}

.kartu-tutor {
    width: 20%;
    margin: 0 auto;
}

.kartu-tutor img {
    width: 80%;
    border-radius: 50%;
}

.kartu-tutor p {
    font-family: 'comic sans ms';
    font-weight: 800;
    font-size: 25px;
    text-align: center;
    color: #364f6b;
}

.partner-list {
    width: 100%;
    position: relative;
    display: flex;
    flex-wrap: wrap;
}

.kartu-partner {
    width: 20%;
    margin: 0 auto;
}

.kartu-partner img {
    width: 150px;
    border-radius: 50%;
}

#contact {
    background: #dedede;
    padding:50px 0px 50px 0px;
}

.footer {
    width: 100%;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    margin: auto;
}

.footer-section {
    width: 20%;
    margin: 0 auto;
}

h3 {
    font-family: 'comic sans ms';
    font-weight: 800;
    font-size: 30px;
    margin-bottom: 20px;
    color: #364f6b;
    width: 100%;
    line-height: 50px;
}

#copyright {
    text-align: center;
    width: 100%;
    padding: 50px 0px 50px 0px;
    margin-top: 50px;
}

@media screen and (max-width: 991.98px) {
    .wrapper {
        width: 90%;
    }

    .logo a {
        display: block;
        width: 100%;
        text-align: center;
    }

    nav .menu {
        width: 100%;
        margin: 0;
    }

    nav .menu ul {
        text-align: center;
        margin: auto;
        line-height: 60px;
    }

    nav .menu ul li {
        display: inline-block;
        float: none;
    }

    section {
        display: block;
    }

    section img {
        display: block;
        width: 100%;
        height: auto;
    }

    .kartu-tutor {
        width: 50%;
    }

    .kartu-partner {
        width: 50%;
    }
}
*,
*:after,
*:before {
  box-sizing: border-box;
}

body {
  font-family: "Inter", sans-serif;
  color: #bdc3c7;
  font-size: calc(1em + 1.25vw);
  background-color: #e6e6ef;
}

form {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
}

label {
  display: flex;
  cursor: pointer;
  font-weight: 500;
  position: relative;
  overflow: hidden;
  margin-bottom: 0.375em;
  /* Accessible outline */
  /* Remove comment to use */
  /*
    &:focus-within {
        outline: .125em solid $primary-color;
    }
  */
}
label input {
  position: absolute;
  left: -9999px;
}
label input:checked + span {
  background-color: #d6d6e5;
}
label input:checked + span:before {
  box-shadow: inset 0 0 0 0.4375em #00005c;
}
label span {
  display: flex;
  align-items: center;
  padding: 0.375em 0.75em 0.375em 0.375em;
  border-radius: 99em;
  transition: 0.25s ease;
}
label span:hover {
  background-color: #d6d6e5;
}
label span:before {
  display: flex;
  flex-shrink: 0;
  content: "";
  background-color: #fff;
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  margin-right: 0.375em;
  transition: 0.25s ease;
  box-shadow: inset 0 0 0 0.125em #00005c;
}

.container {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

label {
    font-family: sans-serif;
    font-size: 1rem;
    padding-right: 5px;
    color : #d6d6e5;
}

select {
    font-size: .1rem;
    padding: 2px 2px;
    
}

.dropdown-primary li.disabled.active{
    background-color: transparent !important;
  }


.map-responsive{
overflow:hidden;
padding-bottom:80%;
position:relative;
align-items: center;
height:0;
}

.map-responsive iframe{
left:0;
top:0;
height:100%;
width:100%;
align-items: center;
position:absolute;
}

.map {
    height: 200px;
    /* The height is 400 pixels */
    width: 80%;
    /* The width is the width of the web page */
  }
                       
