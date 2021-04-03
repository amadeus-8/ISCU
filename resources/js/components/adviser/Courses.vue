<template>
    <div>
        <div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="">
            <div class="">
                <div class="custom-card">
                    <div class="d-flex justify-content-center mb-3">
                        <h4>Physics</h4>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center w-100">
                            <div class="me-3 ms-3">
                                <div>Credits</div>
                                <div class="text-center">4</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Semestr</div>
                                <div class="text-center">7</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Department</div>
                                <div class="text-center">IS</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Subject category</div>
                                <div class="text-center">M</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="me-3 ms-3">
                                <div>Lectures</div>
                                <div class="text-center">12h</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Lab classes</div>
                                <div class="text-center">12h</div>
                            </div>
                            <div class="me-3 ms-3">
                                <div>Practice classes</div>
                                <div class="text-center">12h</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="general-info">
            <h4>General information</h4>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid asperiores commodi dicta doloribus dolorum ea est explicabo fuga id illum, in ipsa laboriosam nisi placeat quae quam quod vero vitae voluptatum! Atque blanditiis earum eius facere fuga ipsam ipsum laborum molestiae mollitia pariatur possimus qui, tenetur voluptatibus. Alias, repellendus!</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Courses"
}
</script>

<style scoped>
    .grid {
        display: grid;
        margin-top: 1rem;
        grid-template-columns: repeat(2, 1fr);
        /*grid-gap: 1.5rem;*/
    }

    .custom-card {
        padding: 1.5rem;
        margin-top: 1rem;
        background: #e2e3e5;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .general-info {
        padding: 1rem;
        margin-top: 1rem;
        background: #e2e3e5;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
