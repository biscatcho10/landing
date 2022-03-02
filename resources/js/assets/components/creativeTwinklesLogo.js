import React from 'react';
import SvgLogo from "../svgjs/Logo";
import SvgBoxOfLogo from "../svgjs/BoxOfLogo";

function CreativeTwinklesLogo(props) {
    return (
        <div className="logo_container">
            <div className="logo">
                <SvgLogo/>
            </div>
            <div className="box_of_logo">
                <SvgBoxOfLogo/>
            </div>
        </div>
    );
}

export default CreativeTwinklesLogo;
