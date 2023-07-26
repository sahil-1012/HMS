
const onLogout = () => {
    window.location.href = "../Login/logout.php";
}

const onNotificationsClick = () => {
    window.location.href = "./empnoti.html";
};

const onAttendanceClick = () => {
    window.location.href = "./empattendance.html";
};

const onFinancesClick = () => {
    window.location.href = "./employeefin.html";
};

const onEmpEnrollClick = () => {
    window.location.href = "./emp_enrl.php";
};

const onEmployeeClick = () => {
    window.location.href = "./Employee.php";
};

const onRoomsClick = () => {
    window.location.href = "./Rooms.php";
};

const onHosteliteEnrollClick = () => {
    window.location.href = "./Host_enrl.php";
};

const onHosteliteClick = () => {
    window.location.href = "./Hostellite.php";
};

const onRequestsClick = () => {
    window.location.href = "./Request.php";
};

const onHomeClick = () => {
    window.location.href = "./E_home.php";
};

const openLogoutPopup = () => {
    var popup = document.getElementById("logoutPopup");
    if (!popup) return;
    var popupStyle = popup.style;
    if (popupStyle) {
        popupStyle.display = "flex";
        popupStyle.zIndex = 100;
        popupStyle.backgroundColor = "rgba(0, 0, 0, 0.7)";
        popupStyle.alignItems = "center";
        popupStyle.justifyContent = "center";
    }
    popup.setAttribute("closable", "");

    var onOutsideClick = popup.onOutsideClick || function (e) {
        if (e.target === popup && popup.hasAttribute("closable")) {
            popupStyle.display = "none";
        }
    };
    popup.addEventListener("click", onOutsideClick);
}

const closeLogoutPopup = () => {
    var popup = document.getElementById("logoutPopup");
    popup.style.display = "none";
}


var scrollAnimElements = document.querySelectorAll("[data-animate-on-scroll]");
var observer = new IntersectionObserver(
    (entries) => {
        for (const entry of entries) {
            if (entry.isIntersecting || entry.intersectionRatio > 0) {
                const targetElement = entry.target;
                targetElement.classList.add("animate");
                observer.unobserve(targetElement);
            }
        }
    }, {
    threshold: 0.15,
}
);

for (let i = 0; i < scrollAnimElements.length; i++) {
    observer.observe(scrollAnimElements[i]);
}


var popupframeButton = document.getElementById("popupframeButton");
if (popupframeButton) {
    popupframeButton.addEventListener("click", function (e) {
        var popup = e.currentTarget.parentNode;

        function isOverlay(node) {
            return !!(
                node &&
                node.classList &&
                node.classList.contains("popup-overlay")
            );
        }
        while (popup && !isOverlay(popup)) {
            popup = popup.parentNode;
        }
        if (isOverlay(popup)) {
            popup.style.display = "none";
        }
    });
}


// var scrollAnimElements = document.querySelectorAll("[data-animate-on-scroll]");
// var observer = new IntersectionObserver(
//     (entries) => {
//         for (const entry of entries) {
//             if (entry.isIntersecting || entry.intersectionRatio > 0) {
//                 const targetElement = entry.target;
//                 targetElement.classList.add("animate");
//                 observer.unobserve(targetElement);
//             }
//         }
//     }, {
//     threshold: 0.15,
// }
// );

// for (let i = 0; i < scrollAnimElements.length; i++) {
//     observer.observe(scrollAnimElements[i]);
