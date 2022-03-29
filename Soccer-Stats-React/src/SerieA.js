import React, { useEffect, useState } from 'react';
import './App.css';
import axios from 'axios';


const SerieA = () => {
    const [data, setData] = useState([]); 
    
    
    useEffect(() => {
        axios('https://api-football-standings.azharimm.site/leagues/ita.1/standings?season=2021&sort=asc')
        .then((response) => { 
            console.log(response.data.data.standings); 
            setData(response.data.data.standings);
            {/*for (var i=0; i< response.standings.length; i++) {
                return (data.data.team.i)
            }*/}
        })
    },[])
    
    
    

    return (
        <div className="standing-output"> 
          {data.map((data, index)  => (
              <div key={data.team.id} className="standing-info">
                  <h1>
                      
                          {index+1}
                          <img src={data.team.logos[0].href} style={{width: "30px"}}/>
                          
                          {data.team.shortDisplayName}
                          </h1>
              </div>
          ))}
            
        </div>
    );
};

     
export default SerieA;

