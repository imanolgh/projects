import React, { Component } from 'react';
import './App.css';
import EPL from './EPL';
import SerieA from './SerieA';
import LaLiga from './LaLiga';
import Bundesliga from './Bundesliga';
import Ligue1 from './Ligue1';
 
 
 
class Buttons extends Component {
    constructor(props) {
        super(props);
        this.state = {eplactive: false};
        this.state = {serieAactive: false};
        this.state = {laligaactive: false};
        this.state = {bundesligaactive: false};
        this.state = {ligue1active: false};
        
       this.handleClickepl = this.handleClickepl.bind(this);
       this.handleClickserieA = this.handleClickserieA.bind(this);
       this.handleClicklaliga = this.handleClicklaliga.bind(this);
       this.handleClickbundesliga = this.handleClickbundesliga.bind(this);
       this.handleClickligue1 = this.handleClickligue1.bind(this);
       
       
    }
 
handleClickepl() {
    this.setState(prevState => ({
    eplactive: !prevState.eplactive
        }));
      }
   
handleClickserieA() {
    this.setState(prevState => ({
    serieAactive: !prevState.serieAactive
        }));
        }
        handleClicklaliga() {
            this.setState(prevState => ({
            laligaactive: !prevState.laligaactive
                }));
              }

              handleClickbundesliga() {
                this.setState(prevState => ({
                bundesligaactive: !prevState.bundesligaactive
                    }));
                  }
                  handleClickligue1() {
                    this.setState(prevState => ({
                    ligue1active: !prevState.ligue1active
                        }));
                      }

 
render() {
    return (
        <div className='buttons'>
            <div className="button-container">
           <div>
                <button id="ind-button" onClick={this.handleClickepl}>{ this.state.eplactive}
                English Premier League</button>
                {this.state.eplactive? <EPL/> : false}
                </div>
                <div>
                <button id="ind-button" onClick={this.handleClickserieA}>{ this.state.serieAactive}
                Serie A</button>
                {this.state.serieAactive? <SerieA/> : false}
                </div>
                <div>
                <button id="ind-button" onClick={this.handleClicklaliga}>{ this.state.laligaactive}
                La Liga Santander</button>
                {this.state.laligaactive? <LaLiga/> : false}
                </div>
                <div>
                <button id="ind-button" onClick={this.handleClickbundesliga}>{ this.state.bundesligaactive}
                Bundesliga</button>
                {this.state.bundesligaactive? <Bundesliga/> : false}
                </div>
                <div>
                <button id="ind-button" onClick={this.handleClickligue1}>{ this.state.ligue1active}
                Ligue 1</button>
                {this.state.ligue1active? <Ligue1/> : false}
                </div>
               
           
            </div>
            <div>
            
         
       
            </div>
        </div>
        );
    }
}
   
 
export default Buttons;

