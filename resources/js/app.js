require("./bootstrap");
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
require("./editor");
// import intersect from "@alpinejs/intersect";
import swal from "sweetalert";

// Alpine.plugin(intersect);
Alpine.plugin(collapse);
window.Alpine = Alpine;
Alpine.start();
