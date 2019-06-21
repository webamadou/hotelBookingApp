import React, { Component } from "react";
import DatePicker from "react-date-picker";
import moment from "moment";

const StepTwo = props => {
    let datestart = new Date(props.date_start);
    let dateend = new Date(props.date_end);
    var timeDiff = Math.abs(dateend.getTime() - datestart.getTime());
    var numberOfNights = Math.ceil(timeDiff / (1000 * 3600 * 24));
    if (props.date_end !== null)
        datestart = moment(datestart).format("MM/DD/YYYY"); //*/
    dateend = moment(dateend).format("MM/DD/YYYY"); //*/

    if (props.currentStep !== 2) {
        return null;
    }
    const images =
        props.room_list !== null
            ? props.room_list.map((room, index) => (
                  <div className="col-xs-12 col-4" key={index}>
                      <input type="radio" name="room_id" value={room.id} />
                      <img
                          src={`http://localhost:8000/api/${room.image}`}
                          className="rounded float-right"
                      />
                  </div>
              ))
            : "";
    console.log(images);
    return (
        <div className="form-group">
            <div className="row">
                <div className="col-4">{datestart}</div>
                <div className="col-4"> to {dateend}</div>
                <div className="col-4"> = {numberOfNights} Nights</div>
            </div>
            <div className="row">{images}</div>
        </div>
    );
};

export default StepTwo;
