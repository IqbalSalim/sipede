require("./bootstrap");

import Alpine from "alpinejs";
require("./editor");
import intersect from "@alpinejs/intersect";
import swal from "sweetalert";

Alpine.plugin(intersect);

window.Alpine = Alpine;
Alpine.start();
