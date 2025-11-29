/**
 * Delete Confirmation with SweetAlert2
 * Handles all delete buttons with class 'delete-btn'
 * Uses AJAX to delete without page reload
 */
(function () {
    "use strict";

    // Get CSRF token from meta tag
    function getCsrfToken() {
        const metaTag = document.querySelector('meta[name="csrf-token"]');
        return metaTag ? metaTag.getAttribute("content") : "";
    }

    function initializeDeleteButtons() {
        // Use event delegation to handle all delete buttons
        document.addEventListener("click", function (e) {
            if (e.target.closest(".delete-btn")) {
                e.preventDefault();
                const button = e.target.closest(".delete-btn");
                const form = button.closest("form");

                if (!form) return;

                const deleteUrl = form.getAttribute("action");
                const itemName =
                    form.getAttribute("data-item-name") || "this item";
                const itemType = form.getAttribute("data-item-type") || "item";
                const row = form.closest("tr"); // Get the table row for removal

                Swal.fire({
                    title: "Are you sure?",
                    text: `You are about to delete ${itemName}. This action cannot be undone!`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    customClass: {
                        popup: "swal2-popup-custom",
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading state
                        Swal.fire({
                            title: "Deleting...",
                            text: "Please wait",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        });

                        // Disable button during request
                        button.disabled = true;

                        // Make AJAX request
                        fetch(deleteUrl, {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": getCsrfToken(),
                                "X-Requested-With": "XMLHttpRequest",
                                Accept: "application/json",
                            },
                        })
                            .then(async (response) => {
                                // Try to parse JSON response
                                const contentType =
                                    response.headers.get("content-type");
                                const isJson =
                                    contentType &&
                                    contentType.includes("application/json");

                                if (!response.ok) {
                                    if (isJson) {
                                        const err = await response.json();
                                        throw new Error(
                                            err.message ||
                                                "Failed to delete item"
                                        );
                                    } else {
                                        throw new Error(
                                            `Error ${response.status}: ${response.statusText}`
                                        );
                                    }
                                }

                                if (isJson) {
                                    return response.json();
                                } else {
                                    // If response is not JSON, assume success
                                    return {
                                        success: true,
                                        message: `${itemName} has been deleted.`,
                                    };
                                }
                            })
                            .then((data) => {
                                // Close loading dialog
                                Swal.close();

                                // Show success message
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text:
                                        data.message ||
                                        `${itemName} has been deleted.`,
                                    timer: 1500,
                                    showConfirmButton: false,
                                    toast: true,
                                    position: "top-end",
                                    customClass: {
                                        popup: "swal2-popup-custom",
                                    },
                                });

                                // Remove the row from table if it exists
                                if (row) {
                                    row.style.transition = "opacity 0.3s";
                                    row.style.opacity = "0";
                                    setTimeout(() => {
                                        row.remove();

                                        // Check if table is empty and show message
                                        const tbody = row.closest("tbody");
                                        if (
                                            tbody &&
                                            tbody.querySelectorAll("tr")
                                                .length === 0
                                        ) {
                                            const table =
                                                tbody.closest("table");
                                            if (table) {
                                                const emptyRow =
                                                    document.createElement(
                                                        "tr"
                                                    );
                                                const colCount =
                                                    table.querySelectorAll(
                                                        "thead th"
                                                    ).length;
                                                emptyRow.innerHTML = `<td colspan="${colCount}" class="text-center">No items found.</td>`;
                                                tbody.appendChild(emptyRow);
                                            }
                                        }
                                    }, 300);
                                }
                            })
                            .catch((error) => {
                                // Close loading dialog
                                Swal.close();

                                // Show error message
                                Swal.fire({
                                    icon: "error",
                                    title: "Error!",
                                    text:
                                        error.message ||
                                        "Something went wrong. Please try again.",
                                    customClass: {
                                        popup: "swal2-popup-custom",
                                    },
                                });

                                // Re-enable button
                                button.disabled = false;
                            });
                    }
                });
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initializeDeleteButtons);
    } else {
        initializeDeleteButtons();
    }
})();
