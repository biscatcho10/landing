import React from 'react';
import SvgOverlap from "../svgjs/Overlap";
import SvgOverlap2 from "../svgjs/Overlap2";
import SvgOverlap3 from "../svgjs/Overlap3";
import SvgOverlap4 from "../svgjs/Overlap4";

function Overlap(props) {
    const overlap = require("../images/overlap.png")
    return (
        <div className="overlap">
            {/*<img src={overlap.default} alt=""/>*/}
            {/*<SvgOverlap/>*/}
            <SvgOverlap4/>
        </div>
    );
}

export default Overlap;
