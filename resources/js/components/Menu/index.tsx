import React, {Component} from 'react';

class Menu extends Component{

  render(){
    return (
      <nav className="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <div className="container">
              <a className="navbar-brand" href="#">
                  Dash
              </a>
              <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span className="navbar-toggler-icon"></span>
              </button>

              <div className="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul className="navbar-nav mr-auto">
                      <li className="nav-item">
                          <a className="nav-link" href="#">Expenses</a>
                      </li>
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul className="navbar-nav ml-auto">
                          <li className="nav-item dropdown">
                              <a id="navbarDropdown" className="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Jobayer
                              </a>

                              <div className="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a className="dropdown-item" href="{{ route('logout') }}"
                                     Log Out
                                  </a>
                              </div>
                          </li>
                  </ul>
              </div>
          </div>
      </nav>
    )
  }
}

export default Menu;
