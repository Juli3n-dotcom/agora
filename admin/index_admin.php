<?php
require_once __DIR__ . '/assets/config/bootstrap_admin.php';

$tmember = getTeam_members($pdo, $_GET['id'] ?? null);


if(($tmember === null)){
  $msg = 'membre est null';
  // ajouterFlash('danger','Veuillez vous connecter');
  // header('location:login_admin.php');
}

$page_title ='Back Office';
include __DIR__. '/assets/includes/header_admin.php';
?>



  <div class="dash__cards">

    <div class="card__single">
      <div class="card__body">
        <span class="ti-briefcase"></span>
        <div>
          <h5>Account Balance</h5>
          <h4>1000000</h4>
        </div>
      </div>
      <div class="card__footer">
      <a href="">View all</a>
      </div>
    </div>

    <div class="card__single">
      <div class="card__body">
        <span class="ti-reload"></span>
        <div>
          <h5>Pending</h5>
          <h4>2000</h4>
        </div>
      </div>
      <div class="card__footer">
      <a href="">View all</a>
      </div>
    </div>

    <div class="card__single">
      <div class="card__body">
        <span class="ti-check-box"></span>
        <div>
          <h5>Processed</h5>
          <h4>22000</h4>
        </div>
      </div>
      <div class="card__footer">
      <a href="">View all</a>
      </div>
    </div>

  </div>

  <section class="recent">
    <div class="activity__grid">
      <div class="activity__card">
        <h3>Recent Activity</h3>

        <div class="table-responsive">
             <table>

          <thead>
            <tr>
              <th>Project</th>
              <th>Start Date</th>
              <th>End date</th>
              <th>Team</th>
              <th>Status</th>
            </tr>
          </thead>
              
          <tbody>
            <tr>
                <td>App Development</td>
                <td>15 Aug, 2020</td>
                <td>22 Aug, 2020</td>
                <td class="td-team">
                  <div class="img-1"></div>
                  <div class="img-2"></div>
                  <div class="img-3"></div>
                </td>
                <td>
                  <span class="badge success">Success</span>
                </td>
              </tr>
              <tr>
                <td>Logo Design</td>
                <td>15 Aug, 2020</td>
                <td>22 Aug, 2020</td>
                <td class="td-team">
                  <div class="img-1"></div>
                  <div class="img-2"></div>
                  <div class="img-3"></div>
                </td>
                <td>
                  <span class="badge success">Success</span>
                </td>
              </tr>
              <tr>
                <td>Server Setting</td>
                <td>15 Aug, 2020</td>
                <td>22 Aug, 2020</td>
                <td class="td-team">
                  <div class="img-1"></div>
                  <div class="img-2"></div>
                  <div class="img-3"></div>
                </td>
                <td>
                  <span class="badge warning">Processing</span>
                </td>
              </tr>
              <tr>
                <td>Front-end Design</td>
                <td>15 Aug, 2020</td>
                <td>22 Aug, 2020</td>
                <td class="td-team">
                  <div class="img-1"></div>
                  <div class="img-2"></div>
                  <div class="img-3"></div>
                </td>
                <td>
                  <span class="badge success">Success</span>
                </td>
              </tr>
              <tr>
                <td>Web Development</td>
                <td>15 Aug, 2020</td>
                <td>22 Aug, 2020</td>
                <td class="td-team">
                  <div class="img-1"></div>
                  <div class="img-2"></div>
                  <div class="img-3"></div>
                </td>
                <td>
                  <span class="badge success">Success</span>
                </td>
              </tr>
          </tbody>
        </table>
        </div>
       
      </div>

      <div class="summary">
          <div class="summary__card">

            <div class="summary__single">
              <span class="ti-id-badge"></span>
              <div>
                <h5>196</h5>
                <small>Nombre d'utilisateurs</small>
              </div>
            </div>

             <div class="summary__single">
              <span class="ti-id-badge"></span>
              <div>
                <h5>196</h5>
                <small>Nombre d'utilisateurs</small>
              </div>
            </div>

             <div class="summary__single">
              <span class="ti-calendar"></span>
              <div>
                <h5>100</h5>
                <small>Nombre de lead</small>
              </div>
            </div>

             <div class="summary__single">
              <span class="ti-face-smile"></span>
              <div>
                <h5>200</h5>
                <small>Profil update request</small>
              </div>
            </div>

          </div>


          <div class="bday__card">

            <div class="bday-flex">

              <div class="bday-img"></div>

              <div class="bday-info">
                <h5>Donald Duck</h5>
                <small>Birthday Today</small>
              <div>

            </div>

            <div class="text-center">
              <button>
                  <span class="ti-gift"></span>
                  Wish him
              </button>
            </div>
              
          </div>


      </div>
    </div>
  </section>
<?php
include __DIR__. '/assets/includes/footer_admin.php';
?>