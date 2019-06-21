import React, { Component } from "react";
import DatePicker from "react-date-picker";

const StepOne = props => {
    let roomList = {};

    if (props.currentStep !== 1) {
        return null;
    }
    return (
        <div className="form-group">
            <div>Book: {props.url_server}</div>
            <label htmlFor="date_start" className="col-form-label">
                Date Start Booking
            </label>
            <DatePicker
                className="form-control"
                onChange={props.setDateStart}
                value={props.date_start}
            />

            <label htmlFor="date_end" className="col-form-label">
                Date End Booking
            </label>
            <DatePicker
                className="form-control"
                onChange={props.setDateEnd}
                value={props.date_end}
            />

            <label htmlFor="room_type" className="col-form-label">
                Pick A Room Type
            </label>
            <select
                name="room_type"
                onChange={props.handleChange}
                className="form-control"
                id="room_type"
            >
                <option value=""> --- </option>
                {Object.keys(props.room_type_list).map(function(key) {
                    return (
                        <option key={key} value={key}>
                            {props.room_type_list[key]}
                        </option>
                    );
                })}
            </select>
        </div>
    );
};

export default StepOne;
