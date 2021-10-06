// @NOTE: grapesjs doesn't support Typescript declarations.
// @ts-nocheck

// @NOTE: Import library functions.
import grapesjs from "grapesjs";
import gjsPresetWebpack from "grapesjs-preset-webpage";
import { useEffect, useState } from "react";

// @NOTE: Import custom functions.
// {...}

// @NOTE: Import misc.
// {...}

/**
 * Editor - page where admin can create new resume.
 *
 * @return {JSX.Element}
 */
export default function ResumesEditor() {
    const [editor, setEditor] = useState(null);

    useEffect(() => {
        const editor = grapesjs.init({
            container: "#editor",
            deviceManager: {
                devices: [
                    {
                        id: "A4",
                        name: "A4",
                        width: "595pt",
                        height: "842pt",
                    },
                ],
            },
            storageManager: {
                type: "",
            },
            fromElement: true,
            plugins: [gjsPresetWebpack],
        });

        // @NOTE: Hide devices dropdown.
        editor.getConfig().showDevices = false;

        // @NOTE: Set fixed canvas sizes.
        const deviceManager = editor.Devices;
        deviceManager.select("A4");

        setEditor(editor);
    }, []);

    return <div id="editor"></div>;
}
