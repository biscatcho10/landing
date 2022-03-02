import React from "react";
import "./assets/styles/app.css"
import Box from "./assets/components/box";
import Overlap from "./assets/components/overlap";
import Copyright from "./assets/components/copyright";
import ShadowBelowBox from "./assets/components/shadowBelowBox";
import PageBackground from "./assets/components/pageBackground";
import Overlay from "./assets/components/overlay";
import BoxThanks from "./assets/components/boxThanks";

function ActionThanks() {
    return (
        <>
            <Overlay/>
            <PageBackground/>
            <BoxThanks/>
            <ShadowBelowBox/>
            <Overlap/>
            <Copyright/>
        </>
    );
}

export default ActionThanks;
