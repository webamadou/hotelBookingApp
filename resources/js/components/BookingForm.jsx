import React from "react";
import axios from "axios";
import { render } from "react-dom";
import { Link } from "react-router-dom";
import Step1 from "./form_setps/step_one";
import Step2 from "./form_setps/step_two";
import Header from "./Header";
import DatePicker from "react-date-picker";

class BookingForm extends React.Component {
    constructor(props) {
        super(props);
        //let { user } = this.props.appstate;
        this.state = {
            token: localStorage["appState"]
                ? JSON.parse(localStorage["appState"]).user.auth_token
                : "",
            url_server: localStorage["appState"]
                ? JSON.parse(localStorage["appState"]).user.url_server
                : "",
            currentStep: 1,
            date_start: null,
            date_end: null,
            currentStep: 1,
            _date_start: null,
            _date_end: null,
            room_type: null,
            room_type_list: {},
            feedbacks: "",
            formdata: {},
            rooms_list: null,
            username: "",
            password: ""
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this._next = this._next.bind(this);
        this._prev = this._prev.bind(this);
        this.previousButton = this.previousButton.bind(this);
        this.nextButton = this.nextButton.bind(this);
        this.setDateStart = this.setDateStart.bind(this);
        this.setDateEnd = this.setDateEnd.bind(this);
        this.room_type_options = this.room_type_options.bind(this);
        this.rooms_list = this.rooms_list.bind(this);

        this.room_type_options();
    }

    handleChange(event) {
        const { name, value } = event.target;
        this.setState({
            [name]: value
        });
    }

    setDateStart(date) {
        this.setState({
            date_start: date,
            _date_start: date.toString()
        });
    }

    setDateEnd(date) {
        this.setState({
            date_end: date,
            _date_end: date.toString()
        });
    }

    handleSubmit(event) {
        event.preventDefault();
        const { email, username, password } = this.state;
        alert(`Your registration detail: \n
           Email: ${email} \n
           Username: ${username} \n
           Password: ${password}`);
    }

    _next() {
        let currentStep = this.state.currentStep;
        let feedbacks = "";
        if (currentStep === 1) {
            let { date_start, date_end, room_type } = this.state;
            if (
                date_start !== null &&
                date_end !== null &&
                room_type !== null
            ) {
                currentStep = 2;
                this.rooms_list(room_type);
                console.log("romms" + this.state.rooms_list);
            } else {
                feedbacks = alert("Some of the fields are still empty!");
            }
        }

        this.setState({
            currentStep: currentStep
        });
    }

    _prev() {
        let currentStep = this.state.currentStep;
        currentStep = currentStep <= 1 ? 1 : currentStep - 1;
        this.setState({
            currentStep: currentStep
        });
    }

    previousButton() {
        let currentStep = this.state.currentStep;
        if (currentStep !== 1) {
            return (
                <button
                    className="btn btn-secondary"
                    type="button"
                    onClick={this._prev}
                >
                    Previous
                </button>
            );
        }
        return null;
    }

    room_type_options() {
        axios
            .get(
                `http://localhost:8000/api/reservations/roomTypeList?token=${
                    this.state.token
                }`
            )
            .then(response => {
                this.setState({ room_type_list: response.data });
            })
            .catch(error => {
                console.error(`An Error Occuredd! ${error}`);
            });
        //With the following we are going to asks to get the list of room type
    }

    rooms_list($room_type) {
        axios
            .get(
                `http://localhost:8000/api/reservations/roomsList/${$room_type}?token=${
                    this.state.token
                }`
            )
            .then(response => {
                this.setState({ rooms_list: response.data });
            })
            .catch(error => {
                console.error(
                    `An Error Occuredd whie getting rooms list! ${error}`
                );
            });
    }

    nextButton() {
        let currentStep = this.state.currentStep;
        if (currentStep < 3) {
            return (
                <button
                    className="btn btn-primary float-right"
                    type="button"
                    onClick={this._next}
                >
                    Next
                </button>
            );
        }
        return null;
    }

    render() {
        return (
            <React.Fragment>
                <nav className="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div className="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                        <h5 className="my-0 mr-md-auto font-weight-normal">
                            <Link to="/" className="navbar-brand">
                                Company name
                            </Link>
                        </h5>
                        <nav className="my-2 my-md-0 mr-md-3" />
                        <button
                            style={{
                                padding: 10,
                                backgroundColor: "red",
                                color: "white"
                            }}
                            onClick={this.props.logoutUser}
                        />
                    </div>
                </nav>
                <p>Step {this.state.currentStep} </p>
                {this.state.feedbacks}
                <form onSubmit={this.handleSubmit}>
                    {/*
    render the form steps and pass required props in
  */}
                    <Step1
                        token={this.state.token}
                        url_server={this.state.url_server}
                        currentStep={this.state.currentStep}
                        handleChange={this.handleChange}
                        setDateStart={this.setDateStart}
                        setDateEnd={this.setDateEnd}
                        date_start={this.state.date_start}
                        date_end={this.state.date_end}
                        room_type={this.state.room_type}
                        room_type_list={this.state.room_type_list}
                    />
                    <Step2
                        room_list={this.state.rooms_list}
                        date_start={this.state._date_start}
                        date_end={this.state._date_end}
                        room_type={this.state.room_type}
                        currentStep={this.state.currentStep}
                        handleChange={this.handleChange}
                        username={this.state.username}
                    />
                    <Step3
                        currentStep={this.state.currentStep}
                        handleChange={this.handleChange}
                        password={this.state.password}
                    />
                    {this.previousButton()}
                    {this.nextButton()}
                </form>
            </React.Fragment>
        );
    }
}

/*function Step2(props) {
    if (props.currentStep !== 2) {
        return null;
    }
    return (
        <div className="form-group">
            <label htmlFor="username">Username</label>
            <input
                className="form-control"
                id="username"
                name="username"
                type="text"
                placeholder="Enter username"
                value={props.username}
                onChange={props.handleChange}
            />
        </div>
    );
} //*/

function Step3(props) {
    if (props.currentStep !== 3) {
        return null;
    }
    return (
        <React.Fragment>
            <div className="form-group">
                <label htmlFor="password">Password</label>
                <input
                    className="form-control"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Enter password"
                    value={props.password}
                    onChange={props.handleChange}
                />
            </div>
            <button className="btn btn-success btn-block">Sign up</button>
        </React.Fragment>
    );
}

export default BookingForm;
