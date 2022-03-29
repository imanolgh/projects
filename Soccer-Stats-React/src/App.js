import React, { Component, Fragment } from 'react';
import Title from './Title';
import Buttons from './Buttons';
import './App.css';
 
 
 
class App extends Component {
 
 
  render() {
      return (
        <Fragment>
        <div>
          <Title/>
        </div>
 
        <div>
          <Buttons />
          </div>
        </Fragment>
        );
       
    }
 
  }
 
 
export default App;
 

