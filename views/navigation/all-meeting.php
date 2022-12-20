<div class="containerPage">
<div class="py-5">
    <div class="container py-5">
        <h2 class="display-3 divider">Conventions</h2>
        <div class="row d-flex justify-content-around">
                    <table class="table">
                        <tbody>
                            <?php
                            foreach ($lastMeetings as $lastMeeting) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= date("d/m/Y", strtotime($lastMeeting->event_date)) ?></td>
                                    <td class="text-center"><?= $lastMeeting->event_name ?></td>
                                    <td class="text-center"><?= $lastMeeting->event_location ?></td>
                                    <td class="text-center">
                                        <!-- Bouton pour voir la fiche de convention -->
                                        <a href="/controllers/view-meetingCtrl.php?id=<?= $lastMeeting->id_meetings ?>"><i class="uil uil-plus-circle button__icon__alt"></i></a>
                                </tr>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div></div>
