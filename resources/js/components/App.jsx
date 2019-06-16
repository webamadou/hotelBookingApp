import React, { Component } from 'react';
import ReactDOM  from 'react-dom';
import { BrowserRouter, Route, Switch} from 'react-router-dom';
import Header from './Header'
import HotelDetails from './HotelDetails'

class App extends Component {
    state = {  }
    render() { 
        return ( 
        <BrowserRouter>
            <div>
                <Header />
                <Switch>
                    <Route exact path='/' component={HotelDetails} />
                </Switch>
            </div>
        </BrowserRouter> );
    }
}
 
ReactDOM.render(<App />, document.getElementById('root'))