import React from "react";
import { Link } from "react-router-dom";

const Login = ({ history, loginUser = f => f }) => {
    let _email, _password;
    const handleLogin = e => {
        e.preventDefault();
        loginUser(_email.value, _password.value);
    };
    return (
        <div className="row">
            <div className="col-12">
                <form
                    className="form-signin"
                    id="login-form"
                    action=""
                    onSubmit={handleLogin}
                    method="post"
                >
                    <h1 className="h3 mb-3 font-weight-normal">
                        Please sign in
                    </h1>
                    <label htmlFor="email-input" className="sr-only">
                        Email address
                    </label>
                    <input
                        ref={input => (_email = input)}
                        autoComplete="off"
                        id="email-input"
                        name="email"
                        type="text"
                        className="form-control"
                        placeholder="email"
                    />
                    <label htmlFor="password-input" className="sr-only">
                        Email address
                    </label>
                    <input
                        ref={input => (_password = input)}
                        autoComplete="off"
                        id="password-input"
                        name="password"
                        type="password"
                        className="form-control"
                        placeholder="password"
                    />
                    <button
                        type="submit"
                        className="btn btn-lg btn-primary btn-block"
                        id="email-login-btn"
                    >
                        Login
                    </button>
                </form>
            </div>
            <div className="col-12 d-flex justify-content-center">
                <Link className="btn btn-link" to="/register">
                    Register
                </Link>
            </div>
        </div>
    );
};

export default Login;
