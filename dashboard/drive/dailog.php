
                            <!-- Add this modal code after the table code -->
                            <!-- Assignees modal -->
                            <div class="modal fade" id="assigneesModal" tabindex="-1" role="dialog" aria-labelledby="assigneesModalLabel" aria-hidden="true">
                                <!-- Assignees Member modal -->

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Assigned Members:</h5>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-8">
                                                                    John Smith
                                                                </div>
                                                                <div class="col-xs-4 text-right">
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#assignedFilesModal">View Files</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-8">
                                                                    Jane Doe
                                                                </div>
                                                                <div class="col-xs-4 text-right">
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#assignedFilesModal">View Files</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-8">
                                                                    Bob Johnson
                                                                </div>
                                                                <div class="col-xs-4 text-right">
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#assignedFilesModal">View Files</button>
                                                                </div>
                                                            </div>
                                                        </li>
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
                                            <h5 class="modal-title" id="assignedFilesModalLabel">Assigned Files for John Smith</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>List of files assigned to John Smith</p>
                                            <ul>
                                                <li>File 1</li>
                                                <li>File 2</li>
                                                <li>File 3</li>
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
                                            <div class="form-group">
                                                <label>Assign to:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="assignType" id="assignToTeam" checked>
                                                    <label class="form-check-label" for="assignToTeam">Team</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="assignType" id="assignToMember">
                                                    <label class="form-check-label" for="assignToMember">Team Member</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Team:</label>
                                                <select id="assignList" class="form-control" multiple>
                                                    <option>Team A</option>
                                                    <option>Team B</option>
                                                    <option>Team C</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Team Member:</label>
                                                <select id="assignList" class="form-control" multiple>
                                                    <option>Member A</option>
                                                    <option>Member B</option>
                                                    <option>Member C</option>
                                                </select>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="assignAllFiles" id="assignAllFiles" checked>
                                                <label class="form-check-label" for="assignAllFiles">Assign All Files</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Select Deliverable:</label>
                                                <select id="assignDeliverables" class="form-control">
                                                    <option>Deliverable A</option>
                                                    <option>Deliverable B</option>
                                                    <option>Deliverable C</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Search Files:</label>
                                                <input type="text" class="form-control" id="assignSearchFiles" placeholder="Enter search term...">
                                            </div>

                                            <label>Select Files:</label>
                                            <select id="assignFiles" class="form-control" multiple>
                                                <option>File A</option>
                                                <option>File B</option>
                                                <option>File C</option>
                                            </select>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addFileBtn">Add File</button>
                                            </div>

                                            <!-- Add Task Button -->
                                            <div class="form-group">
                                                <label for="taskType">Task Type*</label>
                                                <select id="assignList" class="form-control" id="taskType" placeholder="Enter Task Type">
                                                    <option>Task A</option>
                                                    <option>Task B</option>
                                                    <option>Task C</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="taskDescription">Task Description*</label>
                                                <textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter Task Description"></textarea>
                                            </div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#assignModalTask">
                                                <i class="glyphicon glyphicon-plus"></i> Add Task
                                            </button>

                                        </div>
                                        <!-- Assign Modal  Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="assignBtn">Assign</button>
                                        </div>
                                    </div>

                                </div>
                            </div>