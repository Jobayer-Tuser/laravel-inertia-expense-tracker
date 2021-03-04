import React from 'react';
import Menu from '../Menu';

interface Props{
  pageTitle : string;
}

const Layout: React.FC<Props> = (props) =>{

  const {pageTitle} = props;
  return (
    <div className="layout">
        <Menu />
        <div className="container">
            <div className="row">
                <div className="col-sm-12">
                    <h2 className="page-title">{pageTitle}</h2>
                </div>
            </div>
        </div>
    </div>
  );
}

export default Layout;
