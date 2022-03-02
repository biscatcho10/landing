import React from "react";
import "./assets/styles/app.css"
import {BrowserRouter, Route, Switch} from "react-router-dom";
import Action from "./Action";
import NotFound from "./NotFound";
import ActionThanks from "./ActionThanks";

function Routes() {
    return (
        <BrowserRouter>
            <Switch>
                <Route path={"/"} component={Action} exact={true}/>
                <Route path={"/action"} component={Action} exact={true}/>
                <Route path={"/action/thanks"} component={ActionThanks} exact={true}/>
                <Route component={NotFound}/>
            </Switch>
        </BrowserRouter>
    );
}

export default Routes;
