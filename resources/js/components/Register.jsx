import React from "react";
import { Link } from "react-router-dom";

const Register = ({ history, registerUser = f => f }) => {
    let _email, _password;

    const handleLogin = e => {
        e.preventDefault();

        registerUser(_email.value, _password.value);
    };
    return (
        <div className="row">
            <div className="col-12">
                <form
                    className="form-signin"
                    action=""
                    onSubmit={handleLogin}
                    method="post"
                >
                    <h3 style={{ padding: 15 }}>Register Form</h3>
                    <input
                        ref={input => (_email = input)}
                        autoComplete="off"
                        id="email-input"
                        name="email"
                        type="text"
                        className="form-control"
                        placeholder="email"
                    />
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
                        className="btn btn-primarybtn btn-lg btn-primary btn-block"
                        id="email-login-btn"
                    >
                        Register
                    </button>
                    <div className="col-12 d-flex justify-content-center">
                        <Link className="btn btn-link" to="/login">
                            Login
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    );
};
const styles = {
    input: {
        backgroundColor: "white",
        border: "1px solid #cccccc",
        padding: 15,
        float: "left",
        clear: "right",
        width: "80%",
        margin: 15
    },
    button: {
        height: 44,
        boxShadow: "0px 8px 15px rgba(0, 0, 0, 0.1)",
        border: "none",
        backgroundColor: "red",
        margin: 15,
        float: "left",
        clear: "both",
        width: "85%",
        color: "white",
        padding: 15
    },
    link: {
        width: "100%",
        float: "left",
        clear: "both",
        textAlign: "center"
    }
};

export default Register;
