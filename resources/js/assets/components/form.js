import React, {useEffect, useState} from 'react';
import Submit from "./submit";
import Select from 'react-select';
import axios from "axios";


function Form(props) {
    let [industries, setIndustries] = useState(null)
    let [howHear, setHowHear] = useState(null)
    // const selectIndustriesRef = useRef();
    // const selectHowHearRef = useRef();
    const [selectIndustries, setSelectIndustries] = useState([]);
    const [selectHowHear, setSelectHowHear] = useState([]);
    const style = {
        control: base => ({
            ...base,
            border: 0,
            borderRadius: 0,
            borderBottom: "0.5px solid #2C235538",
            // paddingBottom: "15px",
            padding: "9px 0 4px 0px",
            boxShadow: "none",
            background: "transparent",
            marginBottom: "5px"
        }),
        indicatorSeparator: state => ({
            ...state,
            background: "#2C2355"
        }),
        multiValue: state => ({
            ...state,
            background: "transparent",
            color: "#2C2355",
            border: "1px solid #2C2355"
        }),
        multiValueRemove: (base, state) => ({
            ...base,
            "&:hover": {
                backgroundColor: "transparent",
                cursor: "pointer"
                // backgroundColor: "#2C2355",
                // color: "#fff !important"
            }
        }),
        multiValueLabel: state => ({
            ...state,
            color: "#2C2355",
        }),
        valueContainer: (provided, state) => ({
            ...provided,
            padding: '0',
            paddingLeft: "3px",
            background: "transparent"
        }),
        placeholder: (defaultStyles) => {
            return {
                ...defaultStyles,
                textTransform: "uppercase",
                color: "#2C2355"
            }
        }
    };
    useEffect(() => {
        axios.get("/api/action",
            data => data.data
        ).then(r => {
            let {data} = r;
            let indus = []
            let fromWhere = []
            if (data !== undefined && data.industries !== undefined) {
                for (let i in data.industries) {
                    indus.push({value: i, label: data.industries[i]})
                }
                setIndustries(indus.reverse())
            }
            if (data !== undefined && data.fromWhere !== undefined) {
                for (let i in data.fromWhere) {
                    fromWhere.push({value: i, label: data.fromWhere[i]})
                }
                setHowHear(fromWhere.reverse())
            }
        }).catch(err => console.log(err))

        window.fadeOutEffect = function (el, callback) {
            let fadeTarget = el;
            el.style.transition = "opacity 0.5s ease"
            let fadeEffect = setInterval(function () {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.3;
                } else {
                    callback()
                    clearInterval(fadeEffect);
                }
            }, 100);
        }
        let labels = document.querySelectorAll(".input_text.custom label");
        labels.forEach(label => {
            label.addEventListener("click", function () {
                let input = this.parentElement.querySelector("input")
                window.setTimeout(() => input.focus(), 0);
            })
        })
        let inputs = document.querySelectorAll(".input_text.custom input");
        inputs.forEach(input => {
            input.addEventListener("focus", function () {
                let label = this.parentElement.querySelector("label")
                label.classList.add("active")
            })
            input.addEventListener("blur", function () {
                if (this.value === "") {
                    let label = this.parentElement.querySelector("label")
                    label.classList.remove("active")
                }
            })
        })
    }, []);

    function handleInput(e) {
        if (e.target.value === "") {
            console.log(e.target)
            let label = e.target.parentElement.querySelector("label")
            label.classList.remove("active")
        }
    }

    function handleSelectHowHear(value) {
        setSelectHowHear(value)
    }

    function handleSelectIndustries(value) {
        setSelectIndustries(value)
    }

    function formSubmit(e) {
        e.preventDefault()
        let form = e.target
        form.querySelector("button").disabled = true
        const data = new FormData(e.target)
        data.append("how_can_help_you", JSON.stringify(selectHowHear))
        data.append("industry_type", JSON.stringify(selectIndustries))

        axios.post("/api/action", data).then(response => {
            let {data} = response
            if (data.success === true) {
                form.reset()
                let labels = form.querySelectorAll(".input_text.custom label")
                labels.forEach(label => {
                    label.classList.remove("active")
                })
                setSelectIndustries([])
                setSelectHowHear([])
                let overlay = document.querySelector(".overlay")
                overlay.style.opacity = 1
                overlay.classList.add("active")
                window.ani.goToAndStop(1, true)
                window.ani.play()
            }
        })
    }

    return (
        <div className="form">
            <form id={"form"} autoComplete="off" method={"post"} action={"/action"} onSubmit={formSubmit}>
                <input type="hidden" name="type" value="action"/>
                <div className="input_text custom">
                    <label htmlFor="name">Your Name</label>
                    <input className="form-control" type="text" id="name" name="name" placeholder={"Your Name"}
                           required={true} onChange={handleInput}
                           autoComplete="off"/>
                </div>
                <div className="input_text custom">
                    <label htmlFor="name">Business Name</label>
                    <input className="form-control" type="text" placeholder={"Business Name"} name="business_name"
                           autoComplete="off"/>
                </div>
                <div className="input_text custom">
                    <label htmlFor="name">Phone Number</label>
                    <input className="form-control" type="text" placeholder={"Phone Number"} name="phone_number"
                           autoComplete="off"/>
                </div>
                <div className="input_text custom">
                    <label htmlFor="name">Email</label>
                    <input className="form-control" type="email" placeholder={"Email"} name="email" required={true}
                           autoComplete="off"/>
                </div>
                <div className="input_text">
                    <Select
                        defaultValue={[]}
                        value={selectIndustries}
                        rules={{required: true}}
                        isMulti
                        required={true}
                        onChange={handleSelectIndustries}
                        name="how_can_help_you"
                        options={industries}
                        className="basic-multi-select"
                        classNamePrefix="select"
                        placeholder={"You Looking for ?"}
                        styles={style}
                        maxMenuHeight={200}
                    />
                </div>
                <div className="input_text">
                    <Select
                        value={selectHowHear}
                        defaultValue={[]}
                        isMulti
                        rules={{required: true}}
                        required={true}
                        name="industry_type"
                        options={howHear}
                        onChange={handleSelectHowHear}
                        className="basic-multi-select"
                        classNamePrefix="select"
                        placeholder={"How did you hear about us ?"}
                        styles={style}
                        maxMenuHeight={200}
                    />
                </div>
                <Submit/>
            </form>
        </div>
    );
}

export default Form;
