import React from 'react';

function PageBackground(props) {
    // const background = require("../images/background.png")
    // const background = require("../images/background2.png")
    const background = require("../images/background3.png")
    return (
        <div className="page_background">
            <img src={background.default} alt={""}/>
        </div>
    );
}

export default PageBackground;
