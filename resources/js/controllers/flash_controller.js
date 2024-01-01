import { Controller } from "@hotwired/stimulus";
import { Notyf } from "notyf";

import "notyf/notyf.min.css";

// Connects to data-controller="flash"
export default class extends Controller {
    static values = {
        error: String,
        success: String,
        status: String,
    };

    connect() {
        const notyf = new Notyf({
            duration: 5000,
            position: {
                x: "right",
                y: "top",
            },
        });

        this.toastr = notyf;

        if (this.errorValue) {
            notyf.error(this.errorValue);
        }

        if (this.successValue) {
            notyf.success(this.successValue);
        }

        if (this.statusValue) {
            notyf.success(this.statusValue);
        }
    }

    toast(message, type = "success") {
        this.toastr[type](message);
    }
}
