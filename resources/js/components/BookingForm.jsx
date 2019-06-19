import React from "react";
import axios from "axios";
import { render } from "react-dom";
import {} from "react-router-dom";
import Header from "./Header";

class BookingForm extends React.Component {
    constructor(props) {
        super(props);
        //let { user } = this.props.appstate;
        this.state = {
            token: localStorage["appState"]
                ? JSON.parse(localStorage["appState"]).user.auth_token
                : "",
            users: []
        };
    }

    componentDidMount() {
        axios
            .get(
                `http://localhost:8000/api/users/list?token=${this.state.token}`
            )
            .then(response => {
                console.log(response);
                return response;
            })
            .then(json => {
                if (json.data.success) {
                    this.setState({ users: json.data.data });
                } else alert("Login Failed!");
            })
            .catch(error => {
                console.error(`An Error Occuredd! ${error}`);
            });
    }

    render() {
        return (
            <div className="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
                <header className="masthead mb-auto">
                    <div className="inner">
                        <h3 className="masthead-brand">Cover</h3>
                        <nav className="nav nav-masthead justify-content-center">
                            <a className="nav-link active" href="#">
                                Home
                            </a>
                            <a className="nav-link" href="#">
                                Features
                            </a>
                            <a className="nav-link" href="#">
                                Contact
                            </a>
                        </nav>
                    </div>
                </header>

                <main role="main" className="inner cover">
                    <h1 className="cover-heading">Cover your page.</h1>
                    <p className="lead">
                        Cover is a one-page template for building simple and
                        beautiful home pages. Download, edit the text, and add
                        your own fullscreen background photo to make it your
                        own.
                    </p>
                    <p className="lead">
                        <a href="#" className="btn btn-lg btn-secondary">
                            Learn more
                        </a>
                    </p>
                </main>

                <footer className="mastfoot mt-auto">
                    <div className="inner">
                        <p>
                            Cover template for{" "}
                            <a href="https://getbootstrap.com/">Bootstrap</a>,
                            by <a href="https://twitter.com/mdo">@mdo</a>.
                        </p>
                    </div>
                </footer>
            </div>
        );
    }
}

export default BookingForm;
