import React from "react";
import { render } from "react-dom";
import { BrowserRouter, Route, Switch, withRouter } from "react-router-dom";
import BookingForm from "./BookingForm";
import Login from "./Login";
import Register from "./Register";
import Header from './Header';


import axios from "axios";
import $ from "jquery";


class App extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isLoggedIn: false,
            user: {}
        };
        this._loginUser = this._loginUser.bind(this);
        this._registerUser = this._registerUser.bind(this);
        this._logoutUser = this._logoutUser.bind(this);

    }
    _loginUser(email, password){
        $("#login-form button")
            .attr("disabled", "disabled")
            .html(
                '<span class="sr-only">Loading...</span>'
            );
        let formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);

        axios
            .post("http://localhost:8000/api/user/login/", formData)
            .then(response => {
                return response;
            }).then(json => {
                if (json.data.success) {
                    //alert("Login Successful!");
                    const { name, id, email, auth_token } = json.data.data;

                    let userData = {
                        name,
                        id,
                        email,
                        auth_token,
                        timestamp: new Date().toString()
                    };
                    let appState = {
                        isLoggedIn: true,
                        user: userData
                    };
                    // save app state with user date in local storage
                    localStorage["appState"] = JSON.stringify(appState);
                    this.setState({
                        isLoggedIn: appState.isLoggedIn,
                        user: appState.user
                    });
                } else alert("Login Failed!");

                $("#login-form button")
                    .removeAttr("disabled")
                    .html("Login");
            }).catch(error => {
                console.log(`An Error Occured! ${error}`);
                $("#login-form button")
                    .removeAttr("disabled")
                    .html("Login");
            });
    };

    _registerUser(email, password){
        $("#email-login-btn")
            .attr("disabled", "disabled")
            .html('</i><span class="sr-only">Loading...</span>');

        let formData = new FormData();
        formData.append("password", password);
        formData.append("email", email);

        axios
            .post("http://localhost:8000/api/user/register", formData)
            .then(response => {
                console.log(response);
                return response;
            })
            .then(json => {
                if (json.data.success) {
                    alert(`Registration Successful!`);
                    const {id, email, auth_token } = json.data.data;
                    let userData = {
                        id,
                        email,
                        auth_token,
                        timestamp: new Date().toString()
                    };
                    let appState = {
                        isLoggedIn: true,
                        user: userData
                    };
                    // save app state with user date in local storage
                    localStorage["appState"] = JSON.stringify(appState);
                    this.setState({
                        isLoggedIn: appState.isLoggedIn,
                        user: appState.user
                    });
                    // redirect home
                    this.props.history.push("/");
                } else {
                    alert(`Registration Failed!`);
                    $("#email-login-btn")
                        .removeAttr("disabled")
                        .html("Register");
                }
            })
            .catch(error => {
                console.log("An Error Occured!" + error);
                console.log(`${formData} ${error}`);
                $("#email-login-btn")
                    .removeAttr("disabled")
                    .html("Register");
            });
    };

    _logoutUser(){
        let appState = {
            isLoggedIn: false,
            user: {}
        };
        // save app state with user date in local storage
        localStorage["appState"] = JSON.stringify(appState);
        this.setState(appState);
    };

    componentDidMount() {
        let state = localStorage["appState"];
        if (state) {
            let AppState = JSON.parse(state);
            this.setState({ isLoggedIn: AppState.isLoggedIn, user: AppState });
        }
    }

    render() {
        if (
            !this.state.isLoggedIn &&
            this.props.location.pathname !== "/login" &&
            this.props.location.pathname !== "/register"
        ) {
            this.props.history.push("/login");
        }
        if (
            this.state.isLoggedIn &&
            (this.props.location.pathname === "/login" ||
                this.props.location.pathname === "/register")
        ) {
            this.props.history.push("/");
        }
        return (
            <Switch data="data">
                    <Route
                        exact
                        path="/"
                        render={props => (
                            <BookingForm
                                {...props}
                                logoutUser={this._logoutUser}
                                user={this.state.user}
                            />
                        )}
                    />

                    <Route
                        path="/login"
                        render={props => <Login {...props} loginUser={this._loginUser} />}
                    />

                    <Route
                        path="/register"
                        render={props => (
                            <Register {...props} registerUser={this._registerUser} />
                        )}
                    />
            </Switch>
        );
    }
}

const AppContainer = withRouter(props => <App {...props} />);
// console.log(store.getState())
render(
    <BrowserRouter>
        <AppContainer />
    </BrowserRouter>,

    document.getElementById("root")
);
