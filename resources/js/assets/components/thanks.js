import React, {useEffect, useState} from 'react';
import axios from "axios";

function Thanks(props) {

    const [thanksTitle, setThanksTitle] = useState("")
    const [thanksParagraph, setThanksParagraph] = useState("")

    useEffect(() => {
        axios.get("/api/action/thanks",
            data => data.data
        ).then(r => {
            let {data} = r;
            if (data !== undefined && data.thanks_title !== undefined) {
                setThanksTitle(data.thanks_title)
            }
            if (data !== undefined && data.thanks_paragraph !== undefined) {
                setThanksParagraph(data.thanks_paragraph)
            }
        }).catch(err => console.log(err))
    }, [])
    return (
        <div className="thanks">
            <p className={"title"}>{thanksTitle}</p>
            <p>{thanksParagraph}</p>
        </div>
    );
}

export default Thanks;
