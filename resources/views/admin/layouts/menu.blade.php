<nav class="main-header navbar navbar-expand navbar-white navbar-white">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"style="font-size:35px;"></i></a>
          </li>
        </ul>

        <div class="navbar pl-logo">
          <div class="dropdown logo-drop">
            <button class="dropbtnn">
              <i class="fa fa-user" style="font-size:35px;"></i>
                </button>
                  <div class="dropdown-content drop-logocontant">
                    <a href="http://127.0.0.1:8000/admin/profile"><i class="fa fa-user" style="font-size:20px;">&nbsp;&nbsp; Profile</i></a>
                      <a href="{{route('admin.logout')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z"/>
                  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </svg>&nbsp;&nbsp;
              Log Out</a>
            </div>
          </div> 
        </div>
</nav>
</div>
<style>
.fas {
  color: white;
  font-family: "Font Awesome 5 Free";
  }
.main-header{
  background:#8C64D2;
  }
.pl-logo{
  float:right;
  margin-left:90%;
  }
.logo-drop .dropbtnn {
  font-size: 30px;  
  border: none;
  outline: none;
  color: white;
  background-color: inherit;
  font-family: inherit;
  }
.drop-logocontant{
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 150px;
  box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.2);
  }
.drop-logocontant a {
  float: left;
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
  text-align: left;
  }
.drop-logocontant a:hover{
  background-color: #ddd;
  }
.logo-drop:hover .drop-logocontant{
  display: block;
  }
</style>
