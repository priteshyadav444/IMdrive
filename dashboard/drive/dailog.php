<!-- Add this modal code after the table code -->
<!-- Assignees modal -->
<div class="modal fade" id="assignedMembersList" tabindex="-1" role="dialog" aria-labelledby="assigneesModalLabel" aria-hidden="true">
    <!-- Assignees Member modal -->

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Assigned Members:</h5>
                        <ul class="list-group">

                        </ul>


                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Assignees Files modal -->

<div class="modal fade" id="assignedFilesModal" tabindex="-1" role="dialog" aria-labelledby="assignedFilesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignedFilesModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>List of files assigned to <span id="memberName"></span></p>
                <ul id="assignedFilesList">
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Assign Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assignModalLabel">Assign Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Assign to:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="assignType" id="assignToTeam" value="team" checked>
                            <label class="form-check-label" for="assignToTeam">Team</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="assignType" id="assignToMember" value="member">
                            <label class="form-check-label" for="assignToMember">Team Member</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Select Team:</label>
                        <select id="assignTeamList" class="form-control" name="team">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Team Member:</label>
                        <select id="memberList" class="form-control" multiple name="member">
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fileAssignType" id="assignAllFiles" checked>
                        <label class="form-check-label" for="assignAllFiles">Assign All Files</label>
                    </div>

                    <div class="form-group" id="assignDeliverablesSection">
                        <label>Select Deliverable:</label>
                        <select id="assignDeliverables" class="form-control" name="deliverable">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Search Files:</label>
                        <input type="text" class="form-control" id="assignSearchFiles" placeholder="Enter search term...">
                    </div>

                    <label>Select Files:</label>
                    <select id="assignFilesList" class="form-control" multiple name="file">

                    </select>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="addFileBtn">Assign Files </button>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <label for="taskType">Task Type </label>
                        <select id="taskList" class="form-control" id="taskType" placeholder="Enter Task Type" name="task">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="taskDescription">Task Description*</label>
                        <textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter Task Description" name="taskDescription"></textarea>
                    </div>
                    <button  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#assignModalTask">
                        <i class="glyphicon glyphicon-plus"></i> Asign File With Task
                    </button>
                </form>
            </div>
            <!-- Assign Modal  Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary" id="assignBtn">Assign</button> -->
            </div>
        </div>

    </div>
</div>