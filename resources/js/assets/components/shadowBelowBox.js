import React from 'react';

function ShadowBelowBox(props) {
    const shadow = require("../images/shadow-of-box.png"); // with require
    return (
        <div className="shadow">
            <img src={shadow.default}/>
        </div>
    );
}

export default ShadowBelowBox;
