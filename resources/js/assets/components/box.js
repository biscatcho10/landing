import React from 'react';
import Paragraph from "./paragraph";
import Form from "./form";
import Social from "./social";
import CreativeTwinklesLogo from "./creativeTwinklesLogo";
import SvgFormBackground2 from "../svgjs/FormBackground2";

function Box(props) {
    return (
        <div className="box">
            <div className="box_background_container">
                <div className="background_box">
                    {/* <SvgFormBackground/> */}
                    <SvgFormBackground2/>
                </div>
            </div>
            <CreativeTwinklesLogo/>
            <div className="content">
                <Paragraph/>
                <Form/>
            </div>
            <Social/>
        </div>
    );
}

export default Box;
