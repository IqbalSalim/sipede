require("./bootstrap");
require("./editor");

import Alpine from "alpinejs";
import swal from "sweetalert";
import intersect from "@alpinejs/intersect";

Alpine.plugin(intersect);

window.Alpine = Alpine;
Alpine.start();
