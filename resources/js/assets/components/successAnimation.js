import React, {useEffect, useRef} from 'react';
import Lottie from "lottie-web";
import {useHistory} from "react-router-dom"


function SuccessAnimation(props) {
    let history = useHistory()

    let successDiv = useRef();
    window.ani = null
    useEffect(() => {
        window.ani = Lottie.loadAnimation({
            container: successDiv.current,
            renderer: 'svg',
            loop: false,
            autoplay: false,
            path: "/json/form_success.json",

        });
        ani.setSpeed(2)
        ani.onComplete = function () {
            // let overlay = document.querySelector(".overlay")
            // window.fadeOutEffect(overlay, function () {
            //     overlay.classList.remove("active")
            //     let form = document.querySelector("#form")
            //     form.querySelector("button").disabled = false
            // })
            history.push("/action/thanks")
        }
    }, [])

    return (
        <div className="success_animation" ref={successDiv}>
        </div>
    );
}

export default SuccessAnimation;
