<template>
    <footer>
        <div >
                <p class="copyright">
                    copyright &copy; {{2023}}
                </p>
        </div>
    </footer>
</template>

<script>
export default {
    name: "MainFooter",
};
</script>

<style scoped>


.copyright {
    font-size: 1.7rem;
    width: 100%;
    text-align: center;
}

.copyright span {
    font-weight: 700;
    color: var(--dark-green);
}


</style>
