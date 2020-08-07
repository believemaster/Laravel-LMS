<template>
    <div>
        <div
            :data-vimeo-id="lesson.video_id"
            v-if="lesson"
            data-vimeo-width="900"
            id="handstick"
        ></div>
    </div>
</template>

<script>
import Player from "@vimeo/player";
import Swal from "sweetalert";

export default {
    props: ["default_lesson", "next_lesson_url"],
    data() {
        return {
            lesson: JSON.parse(this.default_lesson)
        };
    },
    methods: {
        displayVideoEndedAlert() {
            if (this.next_lesson_url) {
                Swal({
                    title: "Wow! You Completed This Lesson",
                    button: "Next Lesson",
                    icon: "success"
                }).then(() => {
                    window.location = this.next_lesson_url;
                });
            } else {
                Swal({
                    title: "Congrats! You Completed The Series",
                    button: "Finish",
                    icon: "success"
                }).then(() => {
                    window.location = "/";
                });
            }
        }
    },
    mounted() {
        const player = new Player("handstick");

        // player.on("play", () => {
        //   console.log("Playing video");
        // });

        player.on("ended", () => {
            this.displayVideoEndedAlert();
        });
    }
};
</script>
