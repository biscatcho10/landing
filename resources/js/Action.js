import React from "react";
import "./assets/styles/app.css"
import Box from "./assets/components/box";
import Overlap from "./assets/components/overlap";
import Copyright from "./assets/components/copyright";
import ShadowBelowBox from "./assets/components/shadowBelowBox";
import PageBackground from "./assets/components/pageBackground";
import Overlay from "./assets/components/overlay";

function Action() {
    return (
        <>
            <Overlay/>
            <PageBackground/>
            <Box/>
            <ShadowBelowBox/>
            <Overlap/>
            <Copyright/>
        </>
    );
}

export default Action;
