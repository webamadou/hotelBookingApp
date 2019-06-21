import React, { Component } from "react";
import { Link } from "react-router-dom";

const Header = () => (
    <nav className="navbar navbar-expand-md navbar-light navbar-laravel">
        <div className="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 className="my-0 mr-md-auto font-weight-normal">
                <Link to="/" className="navbar-brand">
                    Company name
                </Link>
            </h5>
            <nav className="my-2 my-md-0 mr-md-3">
                <a className="p-2 text-dark" href="#">
                    Features
                </a>
                <a className="p-2 text-dark" href="#">
                    Enterprise
                </a>
                <a className="p-2 text-dark" href="#">
                    Support
                </a>
                <a className="p-2 text-dark" href="#">
                    Pricing
                </a>
            </nav>
            <button
                style={{ padding: 10, backgroundColor: "red", color: "white" }}
                onClick={this.props.logoutUser}
            />
        </div>
    </nav>
);

export default Header;
